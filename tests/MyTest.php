<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MyTest extends TestCase
{
    use WithoutMiddleware;    // 避免中间件的影响
//    use DatabaseMigrations;   // 单元测试 数据迁移
    use DatabaseTransactions; //断言中使用事务，

    /**
     * A basic test example.
     *
     * @return void
     */
//    public function testExample()
//    {
//        $this->assertTrue(true);
//    }
//
//    public function testIndex()
//    {
//        $this->call('GET', '/');
//        $this->assertResponseOk();
//        $this->assertViewHas('articles');
//        $this->assertViewHas('tags');
//    }
//
//
//    public function testNotFound()
//    {
//        $this->call('GET', 'test');
//        $this->assertResponseStatus(404);
//    }
//
//    public function testJson()
//    {
//        $this->get('/phpunitexec/test1')->seeJsonEquals([
//            'created' => true,
//        ]);
//    }

    public function testApplication()
    {
        $this->withoutMiddleware();

        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->withSession(['foo'=>'bar'])
            ->visit('/');
//            ->see('Hello, '.$user->name);

    }

    public function testHttp()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
        // 断言客户端是否被重定向至指定的URL
//        $uri = '/';
//        $this->assertRedirectedTo($uri,$with=[]);
        // 断言 session 中有指定的列表值。
//        $bindings = '';
//        $this->assertSessionHasAll($bindings);


    }

    public function testDatabase()
    {
        $this->seeInDatabase('Users',['email'=>'wkoelpin@example.org']);
        $user = factory(App\User::class,30)->make();
    }

    public function testTranstion1()
    {
        // Laravel 提供了简洁的 expectsEvents 方法，以验证预期的事件有被运行，可防止该事件的任何处理进程被运行
        $this->expectsEvents(App\Events\UserRegistered::class);
        // 如果你希望防止所有事件的处理进程被运行，则可以使用 withoutEvents 方法：
        // $this->withoutEvents();
        //
        // 测试用户注册的代码...
    }

    public function testTranstion2()
    {
        // 如果你希望防止所有事件的处理进程被运行，则可以使用 withoutEvents 方法：
        $this->withoutEvents();

    }

}
