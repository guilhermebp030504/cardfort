<div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgba(255, 165, 0, .2); border: none;">
                <h5 style="font-size: 35px;" class="modal-title" id="TituloModalCentralizado">Perfil do Usuário</h5>
                <button type="button" style="background-color: rgba(255, 250, 250, .001); border: none; padding-top: 10px;" data-dismiss="modal" aria-label="Fechar">
                    <img style="width: 30px; height: 30px; cursor: pointer;" src="{{ asset('img/fechar.png') }}">
                </button>
            </div>
            
            <div id="modal-body">
                <div style="background-color: rgba(255, 165, 0, .2); height: 280px;">
                    <center>
                        @if(Auth::check() && (Auth::user()->foto == 0 || Auth::user()->foto == null))
                            <img src="{{ asset('img/perfil.png') }}" style="background-color: #fff;padding: 10px; border-radius: 50%; border: double; width: 200px; height: 200px; margin-top: 10px;">
                        @elseif(Auth::check())
                            <img src="{{ asset('img/' . Auth::user()->foto) }}" style="background-color: #fff;padding: 10px; border-radius: 50%; border: double; width: 200px; height: 200px; margin-top: 10px;">
                        @else
                            <img src="{{ asset('img/perfil.png') }}" style="background-color: #fff;padding: 10px; border-radius: 50%; border: double; width: 200px; height: 200px; margin-top: 10px;">
                        @endif
                    </center>
                    
                    @auth
                        <center>
                            <p style="margin-top: 10px; font-size: 26px; line-height: 0.9;">
                                {{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}<br>
                                <strong>{{ Auth::user()->usuario }}#{{ Auth::user()->codigo }}</strong>
                            </p>
                        </center>
                    @endauth
                </div>
                
                <div style="background-color: rgba(255, 165, 0, .3); height: 100px;">
                    @auth
                        <p style="padding-top: 30px; padding-left: 5px; font-size: 24px;">
                            <img src="{{ asset('img/email.png') }}" style="height: 30px; width: 30px;"> 
                            {{ Auth::user()->email }}
                        </p>
                    @endauth
                </div>
            </div>
            
            <div style="justify-content: space-between;" class="modal-footer">
                <a href="#">
                    <button style="padding-left: 3px;" type="button" class="btn btn-secondary">
                        <img style="width: 20px; height: 23px; padding-bottom: 3px;" src="{{ asset('img/confg.png') }}"> 
                        Editar Perfil
                    </button>
                </a>
                
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background-color: rgba(255, 250, 250, .001); border: none;">
                        <img style="width: 30px; height: 40px; cursor: pointer;" src="{{ asset('img/sai.png') }}">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>