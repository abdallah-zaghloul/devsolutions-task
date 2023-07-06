<?php /** @noinspection PhpLanguageLevelInspection */

namespace Tests\Unit;

use App\Http\Requests\Api\LongestSubArrayRequest;
use App\Services\LongestSubarrayLengthService;
use PHPUnit\Framework\TestCase;

class LongestSubarrayTest extends TestCase
{
    /**
     * @var LongestSubarrayLengthService
     */
    private LongestSubarrayLengthService $service;

    /**
     * @var LongestSubArrayRequest
     */
    private LongestSubArrayRequest $request;

    /**
     * @var int
     */
    private int $exampleExpected;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->service = app(LongestSubarrayLengthService::class);
        $this->request = app(LongestSubArrayRequest::class);
        $this->request->arr = [1, 2, 3, 4, 5, 1, 2, 3, 4];
        $this->exampleExpected = 5;

    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTaskUsingExample()
    {
        $this->assertEquals($this->exampleExpected, $this->service->execute($this->request));
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTaskUsingArrayHighLevelSolution()
    {
        $expected = count(array_unique($this->request->arr));
        $this->assertEquals($expected, $this->service->execute($this->request));
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTaskUsingCollectionHighLevelSolution()
    {
        $expected = collect($this->request->arr)->unique()->count();
        $this->assertEquals($expected, $this->service->execute($this->request));
    }

}