@extends('Dash.layout')

@section('content')
@if(session('error'))
<div class="alert h-15 w-full bg-red-600 transition-all duration-500">
    {{session('error')}}    
</div>
<script>
    setTimeout(()=>{
        const alert = document.querySelector('.alert');
        if(alert){
            alert.classList.add('opacity-0');
            alert.classList.add('translate-x-10');
            setTimeout(()=>{
                alert.remove();
            },300);
        }
    },2000);
</script>
@endif
<div class="h-auto w-auto mx-3 my-3 ">
    <div class="h-28 bg-sky-500 w-auto rounded-lg justify-center flex items-center"> 
        <p>Dashboard</p>
    </div>
    <div class="h-auto w-auto flex gap-3 mt-6 relative">
        <div class="h-auto bg-back w-full  rounded-lg grid grid-cols-3 px-3 gap-6 py-4">
            <div class=" h-24 w-50 justify-center items-center flex">
                <p class="text-white">fitnes{{$fitnes}}</p>
            </div>
            <div class="h-24 w-50 justify-center items-center flex">
                <p class="text-white">Instruktur {{$totalinstructor}}</p>
            </div>
            <div class="h-24 w-50 text-center ">
                <p>
            </div>
        </div>
        <div class="h-96  bg-back w-5/6  rounded-lg">
            <div class="h-24 w-50 justify-center items-center flex">
                <p id="totalpendapatan" class="text-red-500"></p>
            </div>
        </div>
    </div>
</div>
    <Script>

const subtotal = {!! json_encode($subtotal) !!}; 
const total = subtotal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

document.getElementById('totalpendapatan').innerHTML = total;   


    </Script>
@endsection
