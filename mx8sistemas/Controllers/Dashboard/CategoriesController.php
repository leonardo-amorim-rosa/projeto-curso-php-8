<?php

namespace mx8sistemas\Controllers\Dashboard;

use mx8sistemas\Model\Category;
use mx8sistemas\Core\Helpers;

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
        
        if (isset($formData)) {
            (new Category())->save($formData);
            Helpers::redirectTo('dashboard/categories');
        }
    }
    
    public function edit(int $id): void
    {
        $category = (new Category())->findById($id);
        
        echo $this->template->render('categories/form.html', [
            'category' => $category
        ]);        
    }
    
    public function update(int $id)
    {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if (isset($formData)) {
            $formData["id"] = $id;
            (new Category())->update($formData);
            Helpers::redirectTo('dashboard/categories');
        }
    }
    
    public function delete(): void
    {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if (isset($formData["id"])) {
            (new Category())->delete($formData["id"]);
            Helpers::redirectTo('dashboard/categories');            
        }
    }    
}
