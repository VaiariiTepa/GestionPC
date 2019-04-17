@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row">
        {{-- row Gauche --}}
        <div class="card col-md-5">
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
                            {{-- inclure csrf_field pour éviter les erreurs liées au csrf --}}
                            {!! csrf_field() !!}
                            <div class="form-row">

                                {{-- affichage des visiteurs  --}}
                                <div class="form-group col-md-6">
                                    <select  name="id_visitor">
                                        @foreach ($visitor as $v)
                                            <option value="{{$v->id}}">
                                                {{$v->firstname}} {{$v->lastname}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- affichage Ordinateur --}}
                                <div class="form-group col-md-6">
                                    <select name="id_computer" id="id_computer">
                                        @foreach ($computer as $c)
                                            <option value="{{$c->id}}">
                                                {{$c->ref}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">

                                {{-- horaires_début --}}
                                <div class="form-group col-md-3" id="heure">
                                    Heures début
                                    <input type="text" class="form-control" name="hours" value="7h00" id="input_hours" placeholder="00h00">
                                </div>

                                {{-- Choix durée --}}
                                <div class="row col-md-3">
                                    <div class="form-group col-md-12">durée</div>
                                    <br>
                                    <div class="form-group col-md-12" id="screen_range_hours"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <p>choisir une durée</p>
                                    <input type="range" id="range_hours" value="15" max="240" min="10" step="5">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary">Attribuer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            {{-- Fin row Gauche --}}
        </div>

        {{-- èspace entre GAUCHE/DROITE --}}
        <div class="col-md-1">
        </div>

        {{-- row Droite --}}
        <div class="card col-md-6">
            <div class="card-body">
                <div class="card-title">
                    droite
                </div>
                <div class="card-text">
                    Body panel
                    <table>
                        <thead>
                            <tr>
                                <th>prenom</th><th>nom</th><th>ref_ordi</th>
                                <th>début</th><th>fin</th><th>action</th>
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
                                            {{substr($ca->open,0,-2)}}h
                                        </td>
                                        <td>
                                            {{$ca->close}}
                                        </td>
                                        <td>
                                            <input type="submit" class="btn btn-warning" value="annuler">
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
