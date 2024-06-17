## Тестовое задание

### Задание: 
Необходимо создать административную панель, которая состоит из единого раздела “Выплаты”. 

### Описание: 
Раздел “Выплаты” должен быть представлен в виде таблицы с полями: 
- Логин
- Реквизиты (много текста)
- Сумма 
- Валюта 
- Статус заявки  

Поле “Статус заявки” должно содержать в себе переменную со значениями “Оплачен”/”Не оплачен”. По умолчанию каждой новой записи в таблице присваивается значение статуса “Не оплачен”, по клику на это поле через дроп-меню можно изменить значение статуса на “Оплачен”.   

Новые записи в таблице должны появляться через API-метод, через который будут приходить значения для соответствующих полей в таблице. API должно содержать базовую защиту по токену.