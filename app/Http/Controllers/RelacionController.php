<?php
namespace App\Http\Controllers;

//use Endroid\QrCode\Builder\Builder;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\Logo\Logo;

use Endroid\QrCode\Encoding\Encoding;

use App\Models\Relacion;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Consulta;
use Illuminate\Http\Request;

class RelacionController extends Controller
{
    // Mostrar todas las relaciones
    public function index()
    {
        $relaciones = Relacion::with(['estudiante', 'curso', 'docente', 'certificado'])->get();
        return view('relacion.index', compact('relaciones'));
    }

    // Mostrar el formulario para crear una nueva relación
    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $docentes = Docente::all();
        return view('relacion.create', compact('estudiantes', 'cursos', 'docentes'));
    }

    // Guardar una nueva relación en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'haber' => 'nullable|numeric',
            'debe' => 'nullable|numeric',
        ]);
        Relacion::create($request->all());
        return redirect()->route('relacion.index')->with('success', 'Relación creada exitosamente.');
    }

    // Mostrar el formulario para editar una relación existente
    public function edit($id)
    {
        $relacion = Relacion::findOrFail($id);
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $docentes = Docente::all();
        return view('relacion.edit', compact('relacion', 'estudiantes', 'cursos', 'docentes'));
    }

    // Actualizar una relación en la base de datos
    public function update(Request $request, $id)
    {
        $relacion = Relacion::findOrFail($id);

        $request->validate([
            'idestudiante' => 'required|exists:estudiantes,id',
            'idcurso' => 'required|exists:cursos,id',
            'iddocente' => 'required|exists:docentes,id',
            'idcertificado' => 'nullable|exists:certificados,id',
            'fecha' => 'required|date',
            'calificacion' => 'nullable|numeric|min:0|max:100',
            'monto' => 'required|numeric',
            'haber' => 'nullable|numeric',
            'debe' => 'nullable|numeric',
            'habilitado' => 'required|boolean',
        ]);

        $relacion->update($request->all());
        return redirect()->route('relacion.index')->with('success', 'Relación actualizada exitosamente.');
    }

    // Eliminar una relación de la base de datos
    public function destroy($id)
    {
        $relacion = Relacion::findOrFail($id);
        $relacion->delete();
        return redirect()->route('relacion.index')->with('success', 'Relación eliminada exitosamente.');
    }

    public function certificado(Request $request, $id)
    {

        $dato = Relacion::join('estudiantes', 'estudiantes.id', 'relacions.idestudiante')
                        ->join('cursos', 'cursos.id', 'relacions.idcurso')
                        ->join('docentes', 'docentes.id', 'relacions.iddocente')
                        ->join('certificados', 'certificados.id', 'relacions.idcertificado')
                        ->where('link', $id)->first();

        if ( ! $dato  )
            return "Happy Hacking";

        $data = "https://certificado.habock.com.bo/".$id;

        $consulta = new Consulta;
        $consulta->certificado = $id;
        $consulta->curso = $dato->curso;
        $consulta->estudiante = $dato->nombre." ".$dato->paterno." ".$dato->materno;
        $consulta->ip = $request->ip();
        $consulta->agent = $request->header('User-Agent');
        $consulta->save();

        // Generar QR
        $outputDirectory = public_path('qr-codes');
        $result = Builder::create()
        ->data($data)
        ->size(480)
        ->margin(0)
        ->foregroundColor(new Color(255, 255, 255)) // Color de los cuadritos
        ->backgroundColor(new Color(59, 110, 155)) // Color de fondo
        ->logoPath(public_path('qr-codes/logo.png')) // Ruta al logotipo
        ->logoResizeToWidth(75) // Ajustar el tamaño del logotipo
        ->logoResizeToHeight(75)
        
        ->build();
        $fileName = 'habock-certificate-course.png';
        $qrTempPath = $outputDirectory . '/' . $fileName;
        file_put_contents($qrTempPath, $result->getString());

        // Rutas de las imágenes
        $baseImagePath = public_path('assets/certificado/hacking.png');
        $nombre = $dato->nombre . " " . $dato->paterno . " " . $dato->materno;
        $fontPath = public_path('assets/fonts/FRSCRIPT.TTF');

        // Cargar imágenes
        $baseImage = imagecreatefrompng($baseImagePath);
        $overlayImage = imagecreatefrompng($qrTempPath);

        // Tamaño de la imagen base
        $baseWidth = imagesx($baseImage);
        $baseHeight = imagesy($baseImage);

        // Superponer la imagen
        imagecopyresampled(
            $baseImage,
            $overlayImage,
            0, 0, // Posición X, Y donde colocar la imagen
            0, 0,
            imagesx($overlayImage),
            imagesy($overlayImage),
            imagesx($overlayImage),
            imagesy($overlayImage)
        );

        // Agregar texto
        $textColor = imagecolorallocate($baseImage, 0, 0, 0); // Negro
        imagettftext(
            $baseImage,
            230, // Tamaño de fuente
            0, // Ángulo
            400, // Posición X del texto
            1700, // Posición Y del texto
            $textColor,
            $fontPath,
            $nombre
        );

        // Guardar o mostrar la imagen
        header('Content-Type: image/jpeg');
        imagejpeg($baseImage);

        // Limpiar memoria
        imagedestroy($baseImage);
        imagedestroy($overlayImage);
        exit;
    }
}