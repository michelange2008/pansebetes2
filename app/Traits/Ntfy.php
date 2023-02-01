<?php
namespace App\Traits;

/**
 *
 */
trait Ntfy
{
  function notify(string $message,
                  string $title="Panse-Bêtes",
                  string $priority="default",
                  string $tags="+1")
  {
    file_get_contents('https://ntfy.sh/caracala217', false, stream_context_create([
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
