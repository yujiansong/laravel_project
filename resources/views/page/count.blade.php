{{--@if ($count === 1)--}}
    {{--操场上只有一个同学--}}
{{--@elseif ($count == 0)--}}
    {{--操场上一个同学也没有--}}
{{--@else--}}
    {{--操场上有 {{ $count }} 个同学--}}
{{--@endif--}}

{{--@unless($count)--}}
    {{--操场上一个同学也没有啊，哈哈哈--}}
{{--@endunless--}}

{{--@isset($count)--}}
    {{--操场还是那个操场--}}
{{--@endisset--}}

{{--@empty($count)--}}
    {{--操场还是那个操场，只是没有学生--}}
{{--@endempty--}}

{{--@switch($count)--}}
    {{--@case(1)--}}
        {{--操场上有一个学生--}}
        {{--@break--}}
    {{--@case(0)--}}
        {{--操场上没有学生啊--}}
        {{--@break--}}
    {{--@default--}}
        {{--操场上有 {{ $count }} 个同学--}}
{{--@endswitch--}}


{{--@for( $i = 0; $i <= $count; $i++)--}}
    {{--the number is {{ $i }} <br>--}}
{{--@endfor--}}

{{--@foreach ($talks as $talk)--}}
    {{--{{ $talk->title }}, {{ $talk->length }} <br>--}}
{{--@endforeah--}}

{{--@while ($item = array_pop($items))--}}
    {{--{{ $item->orSomething() }} <br>--}}
{{--@endwhie--}}

@forelse ($students as $student)
    echo 'aaa'
@empty
    echo 'bbb'
@endforelse

