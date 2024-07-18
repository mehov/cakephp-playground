<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

class ArticlesController extends AppController
{

    public function index()
    {
        $tag = 'happy';
        $table = $this->fetchTable('Articles');
        $query = $table->find('all')
            ->contain(['Authors', 'Tags', 'Categories' => ['Blogs']])
            ->matching('Tags', function($q) use($tag) {
                return $q->where(['Tags.name' => $tag]);
            })
            ->where(['Blogs.id' => 1])
            ;
        $this->set('articles', $query->all());
    }

}