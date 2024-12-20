<?php

namespace mx8sistemas\Controllers\Dashboard;

use mx8sistemas\Model\Category;

/**
 * Description of CategoriesController
 *
 * @author leoam
 */
class CategoriesController extends BaseDashboardController
{
    public function index(): void
    {
        $categories = (new Category())->findAll();
        
        echo $this->template->render('categories/index.html', [
            'categories' => $categories
        ]);
    }
    
    public function form(): void
    {
        echo $this->template->render('categories/form.html', []);        
    }
    
    public function save(): void
    {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($formData);
        
        if (isset($formData)) {
            echo 'Categoria salva com sucesso!';
        }
    }
}
