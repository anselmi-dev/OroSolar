@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
    <img src="{{ asset('logo/default-monochrome-black.svg') }}" class="logo" alt="{{ config('app.name', 'Laravel') }}">
</a>
</td>
</tr>
