<?php namespace Innaco\Repositories;

use Innaco\Entities\Template;

class TemplateRepo extends BaseRepo{

    public function getModel()
    {
        return new Template;
    }

    public function newDocument()
    {
        $template = new Template();
        return $template;
    }

}