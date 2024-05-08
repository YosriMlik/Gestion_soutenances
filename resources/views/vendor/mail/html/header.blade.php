@props(['url'])
<tr>
<td class="header">
<a href="https://iit.tn/en/" style="display: inline-block;">
    @if (trim($slot) === 'Laravel')
    <img style="height: 105px; width:180px;" src="https://iit.tn/wp-content/uploads/2019/06/logoISB1-1.png" class="" alt="IIT Logo">
    @else
    {{ $slot }}
    @endif
</a>
<a href="https://iit.tn/en/" style="display: inline-block;">
    @if (trim($slot) === 'Laravel')
    <img style="height: 115px; width:180px;"  src="https://iit.tn/wp-content/uploads/2019/06/logo-isa-mise-a-jour_Plan-de-travail-1.png" class="" alt="ISA Logo">
    @else
    {{ $slot }}
@endif
</a>
<a href="https://iit.tn/en/" style="display: inline-block;">
    @if (trim($slot) === 'Laravel')
    <br>
    <img style="height: 115px; width:170px;"  src="https://iit.tn/wp-content/uploads/2020/08/logo-isb.png" class="" alt="ISB Logo">
    @else
    {{ $slot }}
    @endif
</a>
</td>
</tr>
