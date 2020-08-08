@extends('template')

@section('content')
    <script type="text/javascript" src="{{asset('showImage.js') }}"></script>
    <script type="text/javascript" src="{{asset('deleteImage.js') }}"></script>
    <script class="jsbin" src="{{asset('jquery.min.js') }}"></script>

    <div>
        <form method="post" action="/myAccount/addAdvert/store" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="hidden" id="id" name="id" value="{{$advert['id']  ?? null}}"/>
            <h3>Tytuł: <input id="title" name="title" value="{{$advert['title']  ?? null}}"></h3>
            <h3>Kategoria:
                <select id="category_id" name="category_id">
                    <option disabled selected value>-- Wybierz kategorię --</option>

                    @foreach($categories as $category)
                        <option
                            @isset($advert)
                                @if($category->id == $advert['category_id']) selected="true"
                                @endif
                            @endisset

                            value="{{$category->id}}">{{$category->name}}
                        </option>
                    @endforeach
                </select>
            </h3>
            <h3>Cena: <input type="number" name="price" id="price" value="{{$advert['price']  ?? null}}"></h3>
            <h3>Opis:</h3>
            <textarea id="description" name="description">{{$advert['description'] ?? null}}</textarea>
            <h3>Zdjęcia:</h3>
            <table>
                <tr>
                    @for($i=1;$i<=8;$i++)
                        <td>
                            <img id="{{'photo'.$i}}" name="{{'photo'.$i}}" src="{{url('uploads/'.($advert['photo'.$i]  ?? null))}}" alt="Brak zdjęcia" width="80" height="60"/>
                            <input type="hidden" id="{{'photo_name'.$i}}" name="{{'photo_name'.$i}}" value="{{$advert['photo'.$i] ?? null}}"/>
                        </td>
                    @endfor
                </tr>
                <tr>
                    @for($i=1;$i<=8;$i++)
                        <td>
                            <input type="file" accept="image/*" id="{{'preview_photo'.$i}}" name="{{'preview_photo'.$i}}" onchange="showImage({{$i}});" style="display: none;"/>
                            <button type="button" onclick="document.getElementById({{'\'preview_photo'.$i.'\''}}).click();">Wybierz zdjęcie</button>
                        </td>
                    @endfor
                </tr>
                <tr>
                    @for($i=1;$i<=8;$i++)
                        <td>
                            @if($i!=1)
                                <button type="button" onClick="deleteImage({{$i}});">Usuń zdjęcie</button>
                            @endif
                        </td>
                    @endfor
                </tr>
            </table>
            <input type="submit" value="{{$submit_value}}">
        </form>

        <a href="{{url()->previous()}}"><button>Powrót do listy ogłoszeń</button></a>
    </div>
@endsection('content')
