@extends('template')

@section('content')
    <div>
        <form method="get" action="/find/">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <h3>Wpisz czego szukasz: <input type="text" name="phrase" id="phrase"></h3>

            <h3>Wybierz kategorie:
                <select id="category" name="category">
                    <option value={{null}}>Wszystkie kategorie</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </h3>
            <h3>Cena od <input type="number" name="price_min" id="price_min"></h3>
            <h3>Cena do <input type="number" name="price_max" id="price_max"></h3>
            <h5>Szukaj również w opisach<input type="checkbox" id="description_search" name="description_search"></h5>
            <input type="submit" value="Szukaj">
        </form>
    </div>
@endsection('content')
