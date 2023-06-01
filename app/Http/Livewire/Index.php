<?php

namespace App\Http\Livewire;
use App\Models\TodoList;
use Livewire\WithFileUploads;
use Livewire\Component;

class Index extends Component
{
    use WithFileUploads;

    public $title,$description,$ids;
    public $image, $currentImage;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'image' => 'image|required',
    ];

    public function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->image = '';
    }

    public function AddTodo()
    {
        $this->validate();

       $image = $this->image->storeAs('photos', uniqid() . '.' . $this->image->extension(), 'public');

       $todo  = TodoList::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $image
        ]);



        if($todo)
        {
            session()->flash('message', 'Todo added.');
            $this->resetInputFields();
        }
    }
    public function edit($id)
    {
        $todo = TodoList::find($id);
        $this->ids = $todo->id;
        $this->title = $todo->title;
        $this->description = $todo->description;
    }
    public function render()
    {

        $todolists = TodoList::paginate(5);

        return view('livewire.index', [
            'todolists' => $todolists
        ])
            ->extends('layouts.app')
            ->section('content');
    }

    public function delete($id)
    {
        if($id)
        {
            TodoList::where('id', $id)->delete();
            session()->flash('message', 'Todo deleted !');
        }
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if($this->ids)
        {
            $student = TodoList::find($this->ids);

            $student->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            session()->flash('message', 'Todo detail updated!');
            $this->resetInputFields();
        }
    }

    public function markAsComplete($id)
    {
        $completed = TodoList::findorFail($id);

        if ($completed->update(['completed' => 1])) {

            session()->flash('message', 'Task mark as done !');
        }
    }

    public function markAsInComplete($id)
    {
        $completed = TodoList::findorFail($id);

        if ($completed->update(['completed' => 0])) {

            session()->flash('message', 'Task mark as undone !');
        }
    }
}
