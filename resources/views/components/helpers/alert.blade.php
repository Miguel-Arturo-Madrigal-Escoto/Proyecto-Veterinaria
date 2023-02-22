<div>
    @switch($type)
        @case('success')        
            @php alert()->success($header, $message); @endphp
            @break
    
        @case('info')        
            @php alert()->info($header, $message); @endphp
            @break
        
        @case('warning')        
            @php alert()->warning($header, $message); @endphp
            @break
        
        @case('error')        
            @php alert()->error($header, $message); @endphp
            @break
        
        @case('question')        
            @php alert()->question($header, $message); @endphp
            @break
    
        @default
            
    @endswitch
</div>