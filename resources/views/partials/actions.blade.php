{!! Html::link(route($route.'.edit', $routeId), 'Editar', ['class' => 'btn btn-xs btn-warning']) !!}
{!! Html::link(route($route.'.show', $routeId), 'Ver', ['class' => 'btn btn-xs btn-primary']) !!}
{!! Form::open(['route' => [$route.'.destroy', $routeId], 'method' => 'DELETE', 'style' => "display: inline;"]) !!}
    {!! Form::submit('Remover', ['class' => 'btn btn-xs btn-danger']) !!}
{!! Form::close() !!}