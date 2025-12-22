@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
    <x-app-logo class="text-app-400 w-full max-h-full" alt="{{ config('app.name', 'Laravel') }}" />
</a>
</td>
</tr>
