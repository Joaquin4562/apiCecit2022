<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function all()
    {
        $data = DB::select('SELECT
        i.id AS id_autores,
        i.nombre AS nombre,
        i.apellidop AS ape_pat,
        i.apellidom AS ape_mat,
        i.domicilio AS domicilio,
        i.CURP AS curp,
        i.RFC AS rfc,
        i.telefono AS telefono,
        i.correo AS email,
        i.ingles AS nivel_ingles,
        i.institucion AS escuela,
        i.ciudad AS municipio,
        i.estado AS localidad,
        pr.id AS id_proyectos,
        pr.sede AS sede,
        pr.modalidad AS modalidad,
        pr.titulo AS titulo,
        pr.descripcion AS resumen,
        pr.area AS area,
        pr.categoria AS categoria,
        ase.nombre AS NombreAsesor,
        ase.apellidop AS ApellidoPAsesor,
        ase.apellidom AS ApellidoMAsesor,
        ase.domicilio AS DomicilioAsesor,
        ase.ciudad AS CiudadAsesor,
        ase.estado AS EstadoAsesor,
        ase.CURP AS CURPAsesor,
        ase.RFC AS RFCAsesor,
        ase.telefono AS TelefonoAsesor,
        ase.correo AS CorreoAsesor,
        ase.descripcion AS DescripcionAsesor
    FROM
        integrante1 i
    JOIN proyecto pr ON i.idparticipante = pr.idparticipante
    JOIN usuarios u ON i.idparticipante = u.idparticipante
    JOIN asesor ase ON i.idparticipante = ase.idparticipante
    UNION
    SELECT
        i2.id AS id_autores,
        i2.nombre AS nombre,
        i2.apellidop AS ape_pat,
        i2.apellidom AS ape_mat,
        i2.domicilio AS domicilio,
        i2.CURP AS curp,
        i2.RFC AS rfc,
        i2.telefono AS telefono,
        i2.correo AS email,
        i2.ingles AS nivel_ingles,
        i2.institucion AS escuela,
        i2.ciudad AS municipio,
        i2.estado AS localidad,
        pr.id AS id_proyectos,
        pr.sede AS sede,
        pr.modalidad AS modalidad,
        pr.titulo AS titulo,
        pr.descripcion AS resumen,
        pr.area AS area,
        pr.categoria AS categoria,
        ase.nombre AS NombreAsesor,
        ase.apellidop AS ApellidoPAsesor,
        ase.apellidom AS ApellidoMAsesor,
        ase.domicilio AS DomicilioAsesor,
        ase.ciudad AS CiudadAsesor,
        ase.estado AS EstadoAsesor,
        ase.CURP AS CURPAsesor,
        ase.RFC AS RFCAsesor,
        ase.telefono AS TelefonoAsesor,
        ase.correo AS CorreoAsesor,
        ase.descripcion AS DescripcionAsesor
    FROM
        integrante2 i2
    JOIN proyecto pr ON i2.idparticipante = pr.idparticipante
    JOIN usuarios u ON i2.idparticipante = u.idparticipante
    JOIN asesor ase ON i2.idparticipante = ase.idparticipante');
        return response()->json([
            'data' => $data,
        ]);
    }
}
