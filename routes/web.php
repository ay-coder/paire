<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('index', function () {
    return view('index');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('login', function () {
    return view('login');
});

Route::get('signup', function () {
    return view('signup');
});

/*Route::get('admin',function(){
    return view('adminLogin');
});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('forums',function(){
    return view('forums');
});*/

Route::resource('forum', 'ForumController')->middleware('auth');

/*Route::get('notifications',function (){
    return view('notification');
})->middleware('auth');*/

Route::resource('notifications', 'NotificationController')->middleware('auth');

//Route::resource('forumreply','ForumReplyController@store')->middleware('auth');

Route::post('forumreply', 'ForumReplyController@store')->middleware('auth');

Route::resource('reaction', 'ReactionController')->middleware('auth');


/*Admin panel routes*/
Route::get('adminpanel', function () {
    return view('admin');
})->middleware('auth');

Route::resource('competition', 'CompetitionController')->middleware('auth');

Route::resource('milestone', 'MilestoneController')->middleware('auth');

Route::resource('tool', 'ToolController')->middleware('auth');

Route::resource('knowledge', 'knowledgeController')->middleware('auth');

//Route::resource('config','configController');

Route::get('config', function () {
    $configs = \App\Coreconfig::all();
    return view('configEdit', compact('configs'));
})->middleware('auth');

Route::post('config/store', 'CoreconfigController@store')->middleware('auth');
/*Admin panel routes*/

Route::post('idea.store', 'IdeaController@store')->middleware('auth');

Route::get('profile', function () {
    $tools = \App\Competition::with('milestone')
        ->join('milestones', 'milestones.competition_id', '=', 'competitions.id')
        ->join('tools', 'tools.milestone_id', '=', 'milestones.id')
        ->select('tools.*')
        ->where('competitions.status','=',1)
        ->get();
    $knowledges = \App\Competition::with('milestone')
        ->join('milestones','milestones.competition_id','=','competitions.id')
        ->join('knowledge','knowledge.milestone_id','=','milestones.id')
        ->select('knowledge.*')
        ->get();

    $forums = \App\Forum::all()->where('status','=',1)->where('user_id','=',Auth::user()->id);
    return view('viewUserProfile',compact('tools','knowledges','forums'));
})->middleware('auth')->name('profile');

Route::get('milestone-view-all',function(){
    $completedMilestones = \App\Milestone_completion::with('milestone')->where('user_id','=',Auth::user()->id)->get();
    return view('milestoneViewAll',compact('completedMilestones'));
})->middleware('auth');

Route::get('adminLogin', function(){
    return view('auth/login');
});

Route::get('editProfileUser',function (){
    return view('profileEdit');
})->middleware('auth')->name('editProfileUser');

Route::post('update.user.detail','UserController@updateUser');

Route::post('contacts','ContactController@contactUs');