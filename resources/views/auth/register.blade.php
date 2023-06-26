<x-layouts.auth>
    <x-slot:title>
        Dizimnen ótiw
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Dizimnen ótiw</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <input name="name" type="text" class="form-control" placeholder="Atıńız"
                                        required />
                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div class="input-field">
                                    <input name="email" type="text" class="form-control" placeholder="Email"
                                        required />
                                </div>
                            </div>

                            <div class="form-group py-1 pb-2">
                                <div class="input-field mb-1">
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Jasırın sózdi kiritiń" required />
                                    <button class="btn bg-white text-muted hider">
                                        <span class="far fa-eye"></span>
                                    </button>
                                </div>

                                <div class="input-field">
                                    <input name="password_confirmation" type="password" class="form-control"
                                        id="password" placeholder="Jasırın sózdi tastiyqlań" required />
                                    <button class="btn bg-white text-muted hider">
                                        <span class="far fa-eye"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div class="input-field">
                                    <input name="photo" type="file" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block mt-3">Jiberiw</button>
                            <div class="text-center pt-4 text-muted">
                                Akkauntıńız barma? <a href="{{ route('login') }}">Kiriw</a>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="mx-3 my-2 py-2 bordert">
                      <div class="text-center py-3">
                          <a href="https://wwww.facebook.com" target="_blank" class="px-2">
                              <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg"
                                  alt="" />
                          </a>
                          <a href="https://www.google.com" target="_blank" class="px-2">
                              <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png"
                                  alt="" />
                          </a>
                          <a href="https://www.github.com" target="_blank" class="px-2">
                              <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png"
                                  alt="" />
                          </a>
                      </div>
                  </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>
