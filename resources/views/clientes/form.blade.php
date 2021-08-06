@extends('layout.app')
@section('title', 'Registro')

@section('content')
<h1>Registro</h1>
<hr>

<div class="container">
    @include('layout.messages')

    @if(isset($customer))

        {!! Form::model($customer, ['method' => 'put', 'route' => ['clientes.update', $cliente->id ], 'class' => 'form-horizontal']) !!}

    @else

        {!! Form::open(['method' => 'post','route' => 'clientes.store', 'class' => 'form-horizontal']) !!}

    @endif

    <div class="card">
        <div class="card-header">
      <span class="card-title">
          @if (isset($cliente))
        Editando registro #{{ $cliente->id }}
          @else
        Criando novo registro
          @endif
      </span>
        </div>
        <div class="card-body">
      <div class="form-row form-group">

          {!! Form::label('nome', 'Nome', ['class' => 'col-form-label col-sm-2 text-right']) !!}

          <div class="col-sm-4">

        {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder'=>'Defina o nome']) !!}

          </div>

      </div>
      <div class="form-row form-group">

          {!! Form::label('sobrenome', 'Sobrenome', ['class' => 'col-form-label col-sm-2 text-right']) !!}

          <div class="col-sm-4">

        {!! Form::text('sobrenome', null, ['class' => 'form-control', 'placeholder'=>'Defina o sobrenome']) !!}

          </div>

      </div>
      <div class="form-row form-group">

          {!! Form::label('email', 'E-mail', ['class' => 'col-form-label col-sm-2 text-right']) !!}

          <div class="col-sm-8">

        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Defina o email']) !!}

          </div>

      </div>
      <div class="form-row form-group">

          {!! Form::label('telefone', 'Telefone', ['class' => 'col-form-label col-sm-2 text-right']) !!}

          <div class="col-sm-4">

        {!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder'=>'Defina o telefone']) !!}

          </div>

      </div>
      <div class="form-row form-group">

          {!! Form::label('endereco', 'Endereço', ['class' => 'col-form-label col-sm-2 text-right']) !!}

          <div class="col-sm-10">

        {!! Form::textarea('endereco', null, ['class' => 'form-control', 'placeholder'=>'Defina o endereço completo']) !!}

          </div>

      </div>
        </div>
        <div class="card-footer">
      {!! Form::button('cancelar', ['class'=>'btn btn-danger btn-sm', 'onclick' =>'windo:history.go(-1);']); !!}
      {!! Form::submit(  isset($customer) ? 'atualizar' : 'criar', ['class'=>'btn btn-success btn-sm']) !!}

        </div>
    </div>

    {!! Form::close() !!}

</div>
@endsection
