@extends('layouts.front')
@section('content')
    <style>
        .order-1 {
            order: 1;
        }


        @media (max-width:767px) {
            .order-1 {
                order: unset;
            }
        }

        .row {
            display: flex;
            flex-direction: row;
            width: 100%;
            flex-wrap: wrap;
        }

        @media (min-width:768px) {
            .col-md-3 {
                flex-basis: 33%;
            }

            .col-md-9 {
                flex-basis: 66%;
            }
        }

        .col-md-3 img {
            position: relative;
            transition: all 0.4s ease-in-out;
            opacity: 0;
            display: block;
        }

        .ar {
            margin-left: -600px;
            margin-right: auto;
        }

        .ar.en {
            margin-left: 0;
        }



        .al {
            margin-right: -600px;
            margin-left: auto;
        }

        .al.en {
            margin-right: 0;
        }



        .col-md-3 img.en {
            opacity: 1;
        }
    </style>

    @foreach ($profiles as $k => $profile)
        <div class="info_white1 border_bottom">
            <div class="container">
                <div class="row-fluid row">


                    <div class="col-md-3 ani @if ($k % 2 == 0) order-1 @endif">
                        <img data-src="{{ asset("uploads/bods/$profile->img") }}" alt="{{ $profile->name }}"
                            class="a{{ $k % 2 == 0 ? 'l' : 'r' }}">
                    </div>

                    <div class="col-md-9">
                        <div class="span12">
                            @if ($k == 0 && !empty($profieDates))
                                {{ Form::open(['url' => '/investorrelations/corporateinformation/directorprofile', 'method' => 'post', 'name' => 'dirprofile', 'id' => 'dirprofile']) }}

                                <p class="pull-right">View Year:
                                    {{ Form::select('datesort', $profieDates, Input::get('datesort'), ['class' => 'form-control', 'onchange' => 'this.form.submit();']) }}
                                </p>

                                {{ Form::close() }}
                            @endif
                            <div class="clearfix"></div>
                            <h2 class="red-title">{{ $profile->name }}</h2>
                            {{ $profile->content }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <!-- End Info Resalt-->

    <script>
        const config = {
            rootMargin: '0px',
            threshold: 0.5,
        }
        const observer = new IntersectionObserver(function(entries, self) {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    preloadImage(entry.target)
                    self.unobserve(entry.target)
                }
            })
        }, config)

        const preloadImage = (E) => {
            if (E.name == 'DIV') return
            E = E.querySelector('img')
            if (!E) return
            if (E.dataset.src && E.dataset.src.length) E.src = E.dataset.src
            E.classList.add('en')

        }
        setTimeout(() => {
            document.querySelectorAll('.ani').forEach((file) => observer.observe(file))
        }, 1000)
    </script>
@stop
