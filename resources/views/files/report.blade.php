<x-layout title="Relatório">
<body>
    <div class="row align-items-center h-25 ">
        <div class="col-lg-3 col-md- col-xs-8 mx-auto l-form">
        <h3 style="text-align: center; color:white;"> Importar arquivo TXT </h3>
        </div>
    </div>
    <div class="row align-items-center h-25">
        <div class="col-lg-10 mx-auto">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Loja</th>
                    <th scope="col">Representante</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Data</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Cartão</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $old_name = null;
                        $soma = null;
                    @endphp
                    @foreach($report as $r => $val)
                        @php
                            $name = $val->name;
                        @endphp
                        @if ($name != $old_name && $old_name != null)
                            <tr>
                                <td style="text-align: right" colspan="9">{{'Total R$ ' . number_format($soma, 2, ',', '.')}}</td>
                            </tr>
                            @php
                                $soma = null;
                            @endphp
                        @endif
                        @php
                            $soma = $soma + $val->valor;
                            @endphp
                            <tr>
                                <td>{{$val->id_store}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->representative}}</td>
                                <td>{{$val->hour}}</td>
                                <td>{{$val->date}}</td>
                                <td>{{$val->cpf}}</td>
                                <td>{{$val->card}}</td>
                                <td>{{'R$' . $val->signal . number_format($val->value, 2, ',', '.')}}</td>
                                <td></td>
                            </tr>
                        @php
                            $old_name = $name;
                        @endphp
                    @endforeach
                    <tr>
                        <td style="text-align: right" colspan="9">{{'Total R$ ' . number_format($soma, 2, ',', '.')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</x-layout>