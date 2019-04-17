@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row">
        {{-- row Gauche --}}
        <div class="card col-md-6">
            <div class="card-body">
                <div class="card-title">
                    Créer un nouvelle utilisateur
                </div>
                <div class="card-text">
                    {{-- Formulaire Création Visiteur --}}
                    <form method="post" action="{{ route('create_user') }}">
                            {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-md-4">

                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firtname">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="numberphone" id="numberphone" placeholder="number phone">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="email" class="form-control" name="email" id="email" placeholder="email">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Créer Utilisateur</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card-body">
                <div class="card-title">Attribution d'un Poste</div>
                    <div class="card-text">
                        Body panel
                        <form method="post" action="{{ route('computerassignment') }}">
                            {!! csrf_field() !!}

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {{-- affichage des visiteurs  --}}
                                        <select  name="id_visitor">
                                            @foreach ($visitor as $v)
                                                <option value="{{$v->id}}">
                                                    {{$v->firstname}} {{$v->lastname}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{-- affichage Ordinateur --}}
                                        <select name="id_computer" id="id_computer">
                                            @foreach ($computer as $c)
                                                <option value="{{$c->id}}">
                                                    {{$c->ref}}
                                                </option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                {{-- horaires_début --}}
                                <div class="form-row">
                                    <div class="form-group col-md-3" id="heure">
                                        Heures début
                                        <input type="text" class="form-control" name="hours" value="7h00" id="input_hours" placeholder="00h00">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group col-md-2">durée</div>
                                        <br>
                                        <div class="form-group col-md-1" id="screen_range_hours"></div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <p>choisir une durée</p>
                                        <input type="range" id="range_hours" value="15" max="240" min="10" step="5">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary">Attribuer</button>
                                    </div>
                                </div>
                            {{-- </li> --}}
                        </form>
                    </div>
                </div>
            {{-- Fin row Gauche --}}
            </div>

        {{-- row Droite --}}
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    droite
                    <div>
                        <a href="{{ route('all_assignment') }}"><input type="button" value="rafraîchir"></a>
                    </div>
                </div>
                <div class="panel-body">
                    Body panel
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    prenom
                                </th>
                                <th>
                                    nom
                                </th>
                                <th>
                                    ref_ordi
                                </th>
                                <th>
                                    début
                                </th>
                                <th>
                                    fin
                                </th>
                                <th>
                                    action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{dd($computerassignment)}} --}}
                            @if (isset($computerassignment))
                                @foreach ($computerassignment as $ca)
                                    <tr>
                                        <td>
                                            {{$ca->firstname}}
                                        </td>
                                        <td>
                                            {{$ca->lastname}}
                                        </td>
                                        <td>
                                            {{$ca->ref}}
                                        </td>
                                        <td>
                                            {{$ca->open}}
                                        </td>
                                        <td>
                                            {{$ca->close}}
                                        </td>
                                        <td>
                                            <input type="submit" value="annuler">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            {{-- Fin row Droite --}}
        </div>
    </div>
</div>
@endsection
