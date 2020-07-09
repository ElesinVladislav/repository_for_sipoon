<?php

namespace Tests\Feature;

use App\Message;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * Тестирование вставки сообщения в таблицу БД.
     *
     * @return void
     */
    public function testInsertingIntoDatabase()
    {
        // Создаём в оперативной памяти экземпляр класса User (Пользователь).
        $user = new User();
        // Указываем его имя, почтовый адрес и пароль.
        $user->name = 'Иван';
        $user->email = 'ivan@example.com';
        $user->password = '123';
        // Записываем в БД информацию о пользователя.
        $user->save();

        // Создаём в ОЗУ новый экземпляр класса Message (Сообщение).
        $message = new Message();
        // Указываем заголовок и содержимое сообщения.
        $message->title = 'Привет, мир!';
        $message->content = 'Содержание сообщения.';
        // Указываем автора.
        $message->user_id = $user->id;
        // Записываем в БД информацию о сообщении.
        $message->save();

        // assertDatabaseHas() проверяет таблицу на наличие указанных данных.
        // $message->getTable() возвращает имя таблицы БД ⁠— по умолчанию messages.
        // $message->toArray() возвращает массив атрибутов и их значений.
        $this->assertDatabaseHas($message->getTable(), $message->toArray());
    }
}