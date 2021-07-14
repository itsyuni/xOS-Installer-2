<?php
namespace app\modules;

use httpclient;
use std, gui, framework, app;


class MainModule extends AbstractModule
{

/** 
* @event downloader.done 
*/ 
function doDownloaderDone(ScriptEvent $e = null) 
{ 

    app()->showForm("done");
    app()->hideForm("copyRU");
 
}

    /**
     * @event downloader.errorOne 
     */
    function doDownloaderErrorOne(ScriptEvent $e = null)
    {    
        
$message = $event->error ?: 'Неизвестная ошибка'; 

/** @var HttpResponse $response */ 
$response = $event->response; 

if ($response->isNotFound()) { 
$message = 'Файл не найден'; 
} else if ($response->isAccessDenied()) { 
$message = 'Доступ запрещен'; 
} else if ($response->isServerError()) { 
$message = 'Сервер недоступен'; 
} 

UXDialog::showAndWait('Ошибка загрузки файла: ' . $message, 'ERROR'); 
    }

    /**
     * @event downloader.progress 
     */
    function doDownloaderProgress(ScriptEvent $event = null)
    {    
        
        $procent = round($event->progress * 100 / $event->max, 2);
        $speed = round($this->downloader->speed / 1024);
        $file = $event->file ;
        $size = round($event->max / 1024 / 1024, 2);
        $this->form("copyRU")->progressBar->progressK = $event->progress / $event->max;
        $this->RU_Proc->text = $procent . "%";
    }





}
