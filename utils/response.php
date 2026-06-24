<?php

class Respuestas
{
    public function jsonResponse($message, $data = [], $status = 200)
    {
        http_response_code($status);

        $respuesta = [
            'message' => $message,
            'status' => $status,
            'statusText' => $this->getStatusText($status)
        ];

        if (count($data) > 0) {
            $respuesta['data'] = $data;
        }

        echo json_encode($respuesta);
    }

    private function getStatusText($status)
    {
        switch ($status) {
            case 200:
                return 'OK';
            case 201:
                return 'Created';
            case 204:
                return 'No Content';
            case 400:
                return 'Bad Request';
            case 401:
                return 'Unauthorized';
            case 403:
                return 'Forbidden';
            case 500:
                return 'Internal Server Error';
            case 404:
                return 'Not Found';
            default:
                return 'Unknown';
        }
    }
}

class RespuestasOk extends Respuestas
{
    public function ok($message = 'OK', $data = [])
    {
        parent::jsonResponse($message, $data, 200);
    }

    public function created($message = 'Creado', $data = [])
    {
        parent::jsonResponse($message, $data, 201);
    }

    public function noContent($message = 'No Content', $data = [])
    {
        parent::jsonResponse($message, $data, 204);
    }
}


class RespuestasError extends Respuestas
{
    public function notFound()
    {
        parent::jsonResponse('No encontrado', [], 404);
    }

    public function unauthorized()
    {
        parent::jsonResponse('No autorizado', [], 401);
    }   

    public function forbidden()
    {
        parent::jsonResponse('Prohibido', [], 403);
    }

    public function internalServerError()
    {
        parent::jsonResponse('Error en el servidor', [], 500);
    }

    public function badRequest()
    {
        parent::jsonResponse('Solicitud incorrecta', [], 400);
    }
}