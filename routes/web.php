<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\BlockTemplateGroupController;
use App\Http\Controllers\BlockContentController;
use App\Http\Controllers\BlockTemplateController;
use App\Http\Controllers\BlockTemplateAttributeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ModuleItemController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleRepeaterController;
use App\Http\Controllers\TaxonomyItemController;
use App\Http\Controllers\TaxonomyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\BlockTemplateRepeaterIterationController;
use App\Http\Controllers\BlockTemplateRepeaterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionGroupController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Forum\TopicController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('home');
//});
//


Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

//Route::get('cabinet', [HomeController::class, 'index'])
//    ->name('cabinet')
//    ->middleware('auth');


Auth::routes();
/** Admin Panel */
//Route::name('admin.')->group(function () {
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
    'as' => 'admin.'
], function () {
    \Illuminate\Support\Facades\App::setLocale('ru');
    Route::get('', function () {
        return redirect('admin/pages');
    });

    Route::prefix('pages')->group(function () {
        Route::get('', [PageController::class, 'index'])->name('pages.list');
        Route::get('create', [PageController::class, 'create'])->name('pages.create');
        Route::post('create', [PageController::class, 'store'])->name('pages.store');
        Route::get('edit/{page}', [PageController::class, 'edit'])->name('pages.edit');
        Route::post('update/{page}', [PageController::class, 'update'])->name('pages.update');
        Route::delete('delete/{page}', [PageController::class, 'destroy'])->name('pages.delete');
        Route::prefix('content')->group(function () {
            Route::get('update/{page}', [BlockController::class, 'index'])->name('pages.content.update');
            Route::post('reorder/{model_name}/{model_id}', [BlockController::class, 'updateBlocksOrder'])->name('blocks.order.update');
        });
    });

    Route::prefix('blocks')->group(function () {
        Route::post('create/{model_name}/{model_id}', [BlockController::class, 'store'])->name('blocks.create');
        Route::get('edit/{block}', [BlockController::class, 'edit'])->name('blocks.edit');
        Route::post('update/{block}', [BlockController::class, 'update'])->name('blocks.update');
        Route::post('delete/{block}', [BlockController::class, 'destroy'])->name('blocks.delete');
    });

    Route::prefix('contents')->group(function () {
        Route::get('edit/{block}', [BlockContentController::class, 'edit'])->name('contents.edit');
        Route::post('update/{block}', [BlockContentController::class, 'update'])->name('contents.update');
        Route::post('delete', [BlockContentController::class, 'destroy'])->name('contents.delete');
    });

    Route::prefix('block_templates')->group(function () {
        Route::get('', [BlockTemplateController::class, 'index'])->name('block_templates.list');
        Route::get('create', [BlockTemplateController::class, 'create'])->name('block_templates.create');
        Route::post('create', [BlockTemplateController::class, 'store'])->name('block_templates.store');
        Route::post('load', [BlockTemplateController::class, 'load'])->name('block_templates.load');
        Route::get('edit/{block_template}', [BlockTemplateController::class, 'edit'])->name('block_templates.edit');
        Route::post('update/{block_template}', [BlockTemplateController::class, 'update'])->name('block_templates.update');
        Route::get('delete/{block_template}', [BlockTemplateController::class, 'destroy'])->name('block_templates.delete');
        Route::prefix('attributes')->group(function () {
            Route::get('template/{attribute_type}/{parent_id}', [BlockTemplateAttributeController::class, 'template'])->name('block_templates.attributes.template');
        });
    });

    Route::prefix('block_template_repeaters')->group(function () {
        Route::get('{block_template_repeater}/{parent_type}/{parent_id}', [BlockTemplateRepeaterController::class, 'show'])->name('block_template_repeaters.template');
    });

    Route::prefix('block_template_repeater_iterations')->group(function () {
        Route::delete('{iteration}', [BlockTemplateRepeaterIterationController::class, 'destroy'])->name('block_template_repeater_iterations.delete');
    });

    Route::prefix('block_template_groups')->group(function () {
        Route::get('', [BlockTemplateGroupController::class, 'index'])->name('template.groups.list');
        Route::get('create', [BlockTemplateGroupController::class, 'create'])->name('template.groups.create');
        Route::post('create', [BlockTemplateGroupController::class, 'store'])->name('template.groups.store');
    });

    Route::prefix('variables')->group(function () {
        Route::get('', [VariableController::class, 'index'])->name('variables.list');
        Route::get('create', [VariableController::class, 'create'])->name('variables.create');
        Route::post('create', [VariableController::class, 'store'])->name('variables.store');
        Route::get('edit/{variable}', [VariableController::class, 'edit'])->name('variables.edit');
        Route::post('update/{variable}', [VariableController::class, 'update'])->name('variables.update');
        Route::delete('delete/{variable}', [VariableController::class, 'destroy'])->name('variables.delete');
    });

    Route::prefix('contacts')->group(function () {
        Route::get('', [ContactController::class, 'index'])->name('contacts.list');
        Route::get('create', [ContactController::class, 'create'])->name('contacts.create');
        Route::post('create', [ContactController::class, 'store'])->name('contacts.store');
        Route::get('edit/{variable}', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::post('update/{variable}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('delete/{variable}', [ContactController::class, 'destroy'])->name('contacts.delete');
    });

    Route::prefix('menu')->group(function () {
        Route::get('', [MenuController::class, 'index'])->name('menu.list');
        Route::post('save', [MenuController::class, 'store'])->name('menu.save');
        Route::post('reorder', [MenuController::class, 'updateOrder'])->name('menu.order.update');
    });

    Route::prefix('modules')->group(function () {
        Route::get('', [ModuleController::class, 'index'])->name('modules.list');
        Route::get('create', [ModuleController::class, 'create'])->name('modules.create');
        Route::post('create', [ModuleController::class, 'store'])->name('modules.store');
        Route::get('update/{module}', [ModuleController::class, 'edit'])->name('modules.update');
        Route::post('update/{module}', [ModuleController::class, 'update'])->name('modules.update');
        Route::delete('delete/{module}', [ModuleController::class, 'destroy'])->name('modules.delete');
        Route::prefix('items')->group(function () {
            Route::get('list/{module}', [ModuleItemController::class, 'index'])->name('modules.items.list');
            Route::get('create/{module}', [ModuleItemController::class, 'create'])->name('modules.items.create');
            Route::post('create/{module}', [ModuleItemController::class, 'store'])->name('modules.items.store');
            Route::get('update/{module_item}', [ModuleItemController::class, 'edit'])->name('modules.items.update');
            Route::post('update/{module_item}', [ModuleItemController::class, 'update'])->name('modules.items.update');
            Route::delete('delete/{module_item}', [ModuleItemController::class, 'destroy'])->name('modules.items.delete');

        });
    });


    Route::prefix('taxonomy')->group(function () {
        Route::get('', [TaxonomyController::class, 'index'])->name('taxonomy.list');
        Route::get('create', [TaxonomyController::class, 'create'])->name('taxonomy.create');
        Route::post('create', [TaxonomyController::class, 'store'])->name('taxonomy.store');
        Route::get('edit/{taxonomy}', [TaxonomyController::class, 'edit'])->name('taxonomy.edit');
        Route::post('update/{taxonomy}', [TaxonomyController::class, 'update'])->name('taxonomy.update');
        Route::delete('delete/{taxonomy}', [TaxonomyController::class, 'destroy'])->name('taxonomy.delete');
        Route::prefix('items')->group(function () {
            Route::get('list/{taxonomy}', [TaxonomyItemController::class, 'index'])->name('taxonomy.items.list');
            Route::get('create/{taxonomy}', [TaxonomyItemController::class, 'create'])->name('taxonomy.items.create');
            Route::post('create/{taxonomy}', [TaxonomyItemController::class, 'store'])->name('taxonomy.items.store');
            Route::get('update/{taxonomy_item}', [TaxonomyItemController::class, 'edit'])->name('taxonomy.items.edit');
            Route::post('update/{taxonomy_item}', [TaxonomyItemController::class, 'update'])->name('taxonomy.items.update');
            Route::delete('delete/{taxonomy_item}', [TaxonomyItemController::class, 'destroy'])->name('taxonomy.items.delete');
        });
    });

    Route::resource('user', UserController::class)
        ->except(['show', 'create', 'store']);

    Route::resource('role', RoleController::class)
        ->except(['show']);

    Route::resource('permission', PermissionController::class)
        ->except(['show']);

    Route::resource('permission_group', PermissionGroupController::class)
        ->except(['show']);

    Route::resource('widget', WidgetController::class)
        ->except(['show']);

    Route::resource('language', LanguageController::class)
        ->except(['show']);

    Route::post('comment/moderate/{comment}', [CommentController::class, 'moderate'])->name('comment.moderate');
    Route::resource('comment', CommentController::class)
        ->except(['show']);

    Route::prefix('module_repeaters')->group(function () {
        Route::get('{moduleRepeater}/{parent_iteration_id}', [ModuleRepeaterController::class, 'show'])->name('module_repeaters.template');
    });

//    Route::prefix('languages')->group(function () {
//        Route::get('', [LanguageController::class, 'index'])->name('languages.list');
//    });

    Route::prefix('upload')->group(function () {
        Route::post('image', [UploadController::class, 'image'])->name('upload.image');
    });
});
//});
//Route::prefix('profile')->group(function () {
//    Route::get('', [MouduleItemController::class, 'show'])->name('profile.item');
//});

Route::group([
//    'middleware' => 'auth',
    'as' => 'client.'
], function () {
    Route::prefix('mail')->group(function () {
        Route::post('send', [App\Http\Controllers\MailController::class, 'send'])->name('mail.send');
    });

    foreach (\App\Models\Module::all() as $module) {
        Route::prefix($module->name)->group(function () use ($module) {
            Route::get('{alias}', [App\Http\Controllers\ModuleItemController::class, 'item'])->name("{$module->name}.item");
        });
    }

//    Route::prefix('programs')->group(function () {
////    Route::get('', [App\Http\Controllers\MouduleItemController::class, 'show'])->name('client.programs.items.list');
//        Route::get('{alias}', [App\Http\Controllers\MouduleItemController::class, 'item'])->name('programs.item');
//    });
//
//    Route::prefix('treners')->group(function () {
////    Route::get('', [App\Http\Controllers\MouduleItemController::class, 'show'])->name('client.programs.items.list');
//        Route::get('{alias}', [App\Http\Controllers\MouduleItemController::class, 'item'])->name('treners.item');
//    });
//
//    Route::prefix('news')->group(function () {
////    Route::get('', [App\Http\Controllers\MouduleItemController::class, 'show'])->name('client.programs.items.list');
//        Route::get('{alias}', [App\Http\Controllers\MouduleItemController::class, 'item'])->name('news.item');
//    });

//Route::group([
//    'prefix' => '{lang?}',
//    'where' => ['lang' => '[a-zA-Z]{2}'],
//    'middleware' => ['locale']
//    ], function () {
//        Route::get('{alias?}', [\PageController::class, 'show']);
//    });
});

Route::prefix('topic')->group(function () {
    Route::get('', [TopicController::class, 'index'])->name('client.topic.index');
});
Route::get('search', [SearchController::class, 'index'])->name('client.search');
Route::get('module_items/filter/{params?}', [ModuleItemController::class, 'filter'])->name('client.module_items.filter');
//Route::get('filter');
Route::get('{locale?}/{alias?}', [PageController::class, 'show'])
    ->where('locale', '[a-z]{2}')
    ->middleware('locale');
//
Route::get('/{alias?}', [PageController::class, 'show'])->name('client.page.show')->middleware('locale');

Route::get('/comment/create/{comment}', [CommentController::class, 'create'])->name('client.comment.create')->middleware('auth');
Route::post('/comment/create', [CommentController::class, 'store'])->name('client.comment.store')->middleware('auth');

//Route::name('')->group(function () {
//    Route::group([
//        'middleware' => 'auth',
//    ], function () {
//        Route::get('{locale?}/{alias?}', [PageController::class, 'show'])
//            ->where('locale', '[a-z]{2}')
//            ->middleware('locale');
////
//        Route::get('/{alias?}', [PageController::class, 'show'])->name('page.show')->middleware('locale');
//    });
//});
//dd(2);

//Route::prefix('mail')->group(function () {
//    Route::post('send', [MailController::class, 'send'])->name('mail.send');
//});
//
//Route::prefix('courses')->group(function () {
//    Route::get('{alias}', [MouduleItemController::class, 'item'])->name('courses.item');
//});
//
//Route::prefix('blog')->group(function () {
//    Route::get('{alias}', [MouduleItemController::class, 'item'])->name('blog.item');
//});
//
//Route::prefix('documents')->group(function () {
//    Route::get('{alias}', [MouduleItemController::class, 'item'])->name('documents.item');
//});
//
//Route::prefix('intelligences')->group(function () {
//    Route::get('{alias}', [MouduleItemController::class, 'item'])->name('intelligences.item');
//});
//
//Route::prefix('gosdoc')->group(function () {
//    Route::get('{alias}', [MouduleItemController::class, 'item'])->name('gosdoc.item');
//});
//
//Route::get('search', [SearchController::class, 'index'])->name('search');

//Route::group([
//    'prefix' => '{lang?}',
//    'where' => ['lang' => '[a-zA-Z]{2}'],
//    'middleware' => ['locale']
//    ], function () {
//        Route::get('{alias?}', [\PageController::class, 'show']);
//    });


//Route::get('{locale?}/{alias?}', [PageController::class, 'show'])
//    ->where('locale', '[a-z]{2}')
//    ->middleware('locale');
//Route::get('/{alias?}', [PageController::class, 'show'])->name('page.show')->middleware('locale');



//Route::get('/{alias?}')->middleware('locale');
//Route::group([
//    'prefix' => '{alias}',
////    'where' => ['lang' => '[a-zA-Z]{2}'],
//], function () {
//    Route::get
//});

//Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
