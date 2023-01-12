<x-mail::message>
    # Vítejte na CzechVPN

    Vaše přihlašovací údaje do VPN

    jméno: {{ $vpnUsername }}
    heslo: {{ $vpnPassword }}

    Děkuje tým
    {{ config('app.name') }}
</x-mail::message>
