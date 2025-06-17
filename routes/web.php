<?php
USE Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Models\Task;
use App\Http\Requests\TaskRequest;

// We define this main page, we add a function, and we just return a redifrect to a specific route
//which is tasks index

route::get('/',function(){
return redirect()->route('tasks.index');
});


Route::view('/tasks/create','create')
->name('tasks.create');

Route::get('/tasks/{task}/edit',function ( Task $task){
   return view('edit',[
    'task'=>$task
]);
})->name('task.edit');

Route::get('/tasks', function () {
  return view ('index',[
    'tasks'=>\App\Models\Task::latest()->paginate()
    ]
);
})->name('tasks.index');

route::post('/tasks',function(TaskRequest $request){ 
   // $data=$request->validated();
    // $task=new Task;
    // $task->title=$data['title'];
    // $task->description=$data['description'];
    // $task->long_description=$data['long_description'];

     $task= Task::create($request->validated());

    return redirect()->route('task.show',['task'=>$task->id])
    ->with('success','Task created successsflly!');


})->name('tasks.store');

route::put('/tasks/{task}',function(Task $task, TaskRequest $request){
    // $data=$request->validated();
    // $task->title=$data['title'];
    // $task->description=$data['description'];
    // $task->long_description=$data['long_description'];

    $task->update($request->validated());


    return redirect()->route('task.show', ['task' => $task->id])

    ->with('success','Task updated successsflly!');


})->name('tasks.update');

Route::delete('/tasks/{task}',function(Task $task){
  $task->delete();

  return redirect()->route('tasks.index')
  ->with('success','Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    // Toggle the 'completed' status of the task
    $task->completed = !$task->completed; // Flip the boolean value
    $task->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Task Updated successfully');
})->name('tasks.toggle-complete');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    // Toggle the 'completed' status of the task
    $task->completed = !$task->completed; // Flip the boolean value
    $task->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Task Updated successfully');
})->name('tasks.toggle-complete');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    // Toggle the 'completed' status of the task
    $task->completed = !$task->completed; // Flip the boolean value
    $task->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Task Updated successfully');
})->name('tasks.toggle-complete');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    // Toggle the 'completed' status of the task
    $task->completed = !$task->completed; // Flip the boolean value
    $task->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Task Updated successfully');
})->name('tasks.toggle-complete');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    // Toggle the 'completed' status of the task
    $task->completed = !$task->completed; // Flip the boolean value
    $task->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Task Updated successfully');
})->name('tasks.toggle-complete');

// Route::get('/xxx',function(){
//     return ('Hello');
// })->name('hello');

/*Route::get('/hallo',function(){
    return redirect( '/hello');

});*/

/*Route::get('/hallo',function(){
    return redirect( '/hello');

});*/
//Pse so tum funksionu qikjo kur duhet mem funksionu 

// Route::get('/hallo',function(){
//     return redirect()->route( 'hello');

// });

// Route::get('/greet/{name}',function($name){
//    return 'hello ' .$name .'!';
// });

// Route::fallback(function(){
//   return 'Still got somewhere!!!';
// });
  

// Route::get('/tasks/{id}', function ($id)  {
//     return 'One single task with ID: ' . $id;
// })->name('task.show');
 Route::get('/tasks/{task}',function (Task $task){
    return view('show',['task'=>$task]);
 })->name('task.show');