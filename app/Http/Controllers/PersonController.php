<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Utilities\Age;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $all_persons = Person::all();
        $avgAge = Age::avg($all_persons);
        $sumAge = Age::sum($all_persons);
        $personsCount = Person::count();
        $persons = Person::latest()->paginate(20);

        return view('persons.index', compact( 'avgAge', 'sumAge', 'personsCount', 'persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('persons.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PersonRequest  $request
     * @return RedirectResponse
     */
    public function store(PersonRequest $request): RedirectResponse
    {
        $formData = $request->validated();
        Person::create($formData);

        if (Auth::check()) {
            return redirect(route('dashboard.persons.index'))->with('success', 'Человек добавлен в перепись');
        } else {
            return back()->with('success', 'Человек добавлен в перепись');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Person  $person
     * @return Renderable
     */
    public function edit(Person $person): Renderable
    {
        return view('persons.form', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PersonRequest  $request
     * @param  Person  $person
     * @return RedirectResponse
     */
    public function update(PersonRequest $request, Person $person): RedirectResponse
    {
        $formData = $request->validated();
        $person->updateOrFail($formData);

        return redirect(route('dashboard.persons.index'))->with('success', 'Запись успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Person  $people
     * @return RedirectResponse
     */
    public function destroy(Person $person): RedirectResponse
    {
        $person->deleteOrFail();

        return redirect(route('dashboard.persons.index'))->with('success', 'Запись успешно удалена!');
    }
}
