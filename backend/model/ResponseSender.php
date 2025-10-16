<?php
require_once("middleware/middleware.php");

trait ResponseSender
{
    public static function sendJson(mixed $responseObject, bool $callMiddleware = false): void
    {
        header("Content-Type: application/json");

        echo json_encode($responseObject);
        if ($callMiddleware) {
            self::callMiddleware();
        }
        exit();
    }

    public static function sendText(string $responseText, bool $callMiddleware = false): void
    {
        echo $responseText;
        if ($callMiddleware) {
            self::callMiddleware();
        }
        exit();
    }

    private static function callMiddleware(): void
    {
        $middleware =  new Middleware(1);
        $middleware->execute();
    }
}
