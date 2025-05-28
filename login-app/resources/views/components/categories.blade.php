@push('styles')
<style>
div#fundocat {
    z-index: -1;
    background-attachment: fixed;
}
</style>
@endpush

<div id="fundocat">
    <div class="responsivel" style="height: 35vh; width: 1300px; margin: 0px auto 150px auto;">
        <br>
        <center>
            <h2 class="categorias">Categorias para explorar</h2>
        </center>
        
        <form name="form_busca" id="form_busca" method="get" action="#">
            @csrf
            <table width="100%">
                <br>
                <tr>
                    <th width="15%">
                        <button type="submit" name="1" value="1">
                            <img class="catimg" src="{{ asset('img/cadeira_gamer_1-removebg.png') }}">
                        </button>
                    </th>
                    <th width="5%"></th>
                    <th width="15%">
                        <button type="submit" name="2" value="2">
                            <img class="catimg" src="{{ asset('img/cadeira_escritorio_2-removebg-preview.png') }}">
                        </button>
                    </th>
                    <th width="5%"></th>
                    <th width="15%">
                        <button type="submit" name="3" value="3">
                            <img class="catimg" src="{{ asset('img/8b2f90f21104e711006b2439873f143e-removebg-preview.png') }}">
                        </button>
                    </th>
                    <th width="5%"></th>
                    <th width="15%">
                        <button type="submit" name="4" value="4">
                            <img class="catimg" src="{{ asset('img/4438036_Kit_02_Cadeiras_Para_Sala_de_Jantar_Cozinha_Nik_Canela_Courino_Camel_Gran_Belo_12315107_z-removebg-preview.png') }}">
                        </button>
                    </th>
                    <th width="5%"></th>
                    <th width="15%">
                        <button type="submit" name="5" value="5">
                            <img class="catimg" src="{{ asset('img/a7e85b3217a5dcdb9f7ba4322afcf10f-removebg-preview.png') }}">
                        </button>
                    </th>
                </tr>

                <tr>
                    <th width="15%">
                        <center>
                            <button type="submit" name="1" value="1" class="nome_cat">Cadeira Gamer</button>
                        </center>
                    </th>
                    <th width="5%"></th>
                    <th width="15%">
                        <center>
                            <button type="submit" name="2" value="2" class="nome_cat">Cadeira de Escritório</button>
                        </center>
                    </th>
                    <th width="5%"></th>
                    <th width="15%">
                        <center>
                            <button type="submit" name="3" value="3" class="nome_cat">Cadeira Decorativa</button>
                        </center>
                    </th>
                    <th width="5%"></th>
                    <th width="15%">
                        <center>
                            <button type="submit" name="4" value="4" class="nome_cat">Cadeira para Sala</button>
                        </center>
                    </th>
                    <th width="5%"></th>
                    <th width="15%">
                        <center>
                            <button type="submit" name="5" value="5" class="nome_cat">Cadeira de Jantar</button>
                        </center>
                    </th>
                </tr>
            </table>
        </form>
    </div>
</div>
