@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row">
        {{-- row Gauche --}}
        <div class="card col-md-5">
            <div class="card-body">
                <div class="card-title">
                    <h3>Créer un visiteur</h3>
                </div>
                <div class="card-text">
                    {{-- Formulaire Création Visiteur --}}
                    <form method="post" action="{{ route('create_user') }}">
                            {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-md-4">

                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="numberphone" id="numberphone" placeholder="Téléphone">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title"><h3>Attribuer un ordinateur</h3></div>
                    <div class="card-text">
                        Visiteurs
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
                                    ref_ordi
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
                    Liste des attributions
                </div>
                <div class="card-text">
                    <table class="table">
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

                                        {{-- Formatage de l'heure de début --}}
                                        <td>
                                            {{substr($ca->open,0,-2)}}h{{substr($ca->open,-2)}}
                                        </td>

                                        {{-- Formatage de l'heure de fin --}}
                                        <td>
                                            @if (substr($ca->close,-2) == 60)

                                                {{-- Dissimuler formatage heures dans INPUT(hidden) --}}
                                                <input type="hidden" value="
                                                {{$hours = substr($ca->close,0,-2)}}
                                                {{$hours = $hours+1}}
                                                {{$minute = substr($ca->close,-2)}}
                                                {{$minute = 00}}
                                                ">
                                                {{$hours}}h{{$minute}}
                                            @else
                                            {{substr($ca->close,0,-2)}}h{{substr($ca->close,-2)}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{$ca->id}}/cancel" button class="btn btn-danger btn-small btn-delete">Annuler</a>
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
