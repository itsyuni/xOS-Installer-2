<?php
namespace app\forms;

use std, gui, framework, app;


class Activate extends AbstractForm
{

    /**
     * @event imageAlt.click-Left 
     */
    function doImageAltClickLeft(UXMouseEvent $e = null)
    {    
        
    }

    /**
     * @event button.click-Left 
     */
    function doButtonClickLeft(UXMouseEvent $e = null)
    {    
        if ( $this->edit->text == "HDS80" ){
            $this->LoadForm("copyRU");
            pre("Активация прошла успешно!");
        }  elseif ( $this->edit->text == 3DMK3 ){
                $this->LoadForm("form");    
                pre("Активация прошла успешно!");
        } else {
            pre ("Ключ введён неверно!");
    }
    
    }



}
