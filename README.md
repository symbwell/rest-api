[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

## Testowe RestAPI

Zadanie testowe polegające na stworzeniu prostego REST API do zarządzania nieskomplikowaną bazą użytkowników. 

Możliwości:
1. Pobieranie listy użytkowników
2. Tworzenie nowego użytkownika
3. Edycja użytkownika
4. Podgląd pojedyńczego użytkownika
5. Usuwanie użytkownika

## Wersja Online

Wersja online dostępna jest pod adresem: [restapi.paranormalstudio.pl](https://restapi.paranormalstudio.pl)

## Korzystanie z API

Do korzystania z API w celach testowych najelpiej użyć programu Postman. 

1. Pobieranie listy użytkowników:
```
GET /api/users
```

2. Edycja użytkownika użytkowników (Należy podać ID):
```
PUT /api/users/update/$id
```

3. Dodawanie użytkownika:
```
POST /api/users/add
```

4. Usuwanie użytkownika (Należy podać ID):
```
DELETE /api/users/delete/$id
```

Zapytaniu PUT i POST przyjmują następujące klucze:
* name - string, max. 255 znaków
* surname - string, max. 255 znaków
* age - string, max. 255 znaków
* phone - string, max. 255 znaków
* email - string, max. 255 znaków
* salary - decimal, max. 11 znaków
* password - string, 2048 znaków

## Jak uruchomić lokalnie

Krok pierwszy to uruchomienie przygotowanego dockera następującą komendą w katalogu głównym:
```
docker-compose up
```

Aplikacja powinna być dostępna pod adresem [localhost:8080](http://localhost:8080)

## Dodatkowe metody

Dodatkowe metody API to settery i gettery poszczególnych pól użytkownika. Na przykład:

```
PUT /api/users/setAge/$id
```

lub

```
GET /api/users/getAge/$id
```

W powyższym przykładzie podajemy ID użytkownika oraz w "body" naszego zapytania ustawiamy klucz "toSet" z zadaną wartością.

Settery i Gettery dostępne są dla wszystkich pól:
* setUserName i getUserName
* SetSurname i getSurname
* setAge i getAge
* setPhone i GetPhone
* setEmail i getEmail
* setPassword i getPassword
* setSalary i getSalary

## Pole "Password"

Pole password nie jest zwracane bezpośrednio na liście użytkowników. Jego zawartość można uzyskać jedynie wywołując:

```
GET /api/users/getPassword/$id
```

Hasło w bazie danych jest szyfrowane. 
