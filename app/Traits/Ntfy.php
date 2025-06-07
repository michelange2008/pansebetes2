<?php
namespace App\Traits;

/**
 * Permet d'envoyer un notification sur le compte ntfy défini dans .env
 */
trait Ntfy
{
  function notify(string $message,
                  string $title="Panse-Bêtes",
                  string $priority="default",
                  string $tags="+1")
  {
    file_get_contents(config('ntfy.ntfy'), false, stream_context_create([
        'http' => [
            'method' => 'POST', // PUT also works
            'header' =>
              "Content-Type: text/plain\r\n" .
              "Title: ".$title."\r\n" .
              "Priority: ".$priority."\r\n" .
              "Tags: ".$tags ,
            'content' => $message,
        ]
    ]));
  }
}
