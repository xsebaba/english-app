<x-mail::message>
# Dziękujemy za zakup naszego kursu

W załączeniu znajduje się plik pdf z naszym kursem do pobrania.
Jeśli masz jakiekolwiek pytania skontaktuj się z nami. 

<x-mail::button :url="''">
Button Text
</x-mail::button>

Miłego Dnia,<br>
{{ config('app.name') }}
</x-mail::message>
