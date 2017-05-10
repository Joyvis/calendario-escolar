<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<ul class="list-inline subttl" data-select='falta-nao-justificada'>
			<li>
				<i class="color-subtitle red-student"></i>
			</li>
			<li><span>Faltas não justificadas</span></li>
		</ul>

		<ul class="list-inline subttl" data-select='atestado-medico'>
			<li>
				<i class="color-subtitle blue-student"></i>
			</li>
			<li><span>Atestado Médico</span></li>
		</ul>

		<ul class="list-inline subttl" data-select='faltas-justificada'>
			<li>
				<i class="color-subtitle orange"></i>
			</li>
			<li><span>Faltas Justificadas</span></li>
		</ul>


		<ul class="list-inline subttl" data-select=''>
			<li>
				<i class="color-subtitle"></i>
			</li>
			<li><span>Presença</span></li>
		</ul>
	</div>
	<div class="col-md-6">
		<ul class="list-inline subttl" data-select='paralisacao'>
			<li>
				<i class="color-subtitle brown"></i>
			</li>
			<li><span>Paralisação</span></li>
		</ul>

		<ul class="list-inline subttl" data-select='greve'>
			<li>
				<i class="color-subtitle green-student"></i>
			</li>
			<li><span>Greve</span></li>
		</ul>
		<ul class="list-inline subttl" data-select='intemperie'>
			<li>
				<i class="color-subtitle yellow-student"></i>
			</li>
			<li><span>Intempérie</span></li>
		</ul>

	</div>
</div>
<div class="col-md-6">
	<div class="col-md-6">
		<ul class="list-inline">
			<li>
				<input type="text" id="faltas-justificadas" readonly="readonly" value="0">
			</li>
			<li><span>Faltas Justificadas</span></li>
		</ul>
		<ul class="list-inline">
			<li>
				<input type="text" id="faltas-nao-justificadas" readonly="readonly" value="0">
			</li>
			<li><span>Faltas Não Justificadas</span></li>
		</ul>
	</div>
	<div class="col-md-6">
		<ul class="list-inline">
			<li>
				<input type="text" id="atestados-medicos" readonly="readonly" value="0">
			</li>
			<li><span>Atestados Médicos</span></li>
		</ul>
		<ul class="list-inline">
			<li>
				<input type="text" id="total-faltas" readonly="readonly" value="0">
			</li>
			<li><span>Total de Faltas</span></li>
		</ul>
	</div>
	<div class="col-md-12">
		<ul class="list-inline">
			<li>
				<a href="#" class="btn btn-success" id="save-calendar">SALVAR</a>
				{{ csrf_field() }}
				<input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
			</li>
			<li>
				<a href="{{route('user.index')}}" class="btn btn-info" >VOLTAR</a>
			</li>
			<ul class="list-inline">
				<li>
					<small>Clique sobre a legenda e depois sobre os dias que deseja atribui-las</small>
				</li>
			</ul>
		</ul>
	</div>
	
</div>