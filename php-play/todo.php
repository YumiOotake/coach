<?php

class TodoList
{
    private string $owner;
    private array $tasks;

    public function __construct(string $owner)
    {
        $this->owner = $owner;
        $this->tasks = [];
    }

    public function addTask(string $title): void
    {
        if (trim($title) === '') {
            return;
        }
        $this->tasks[] = [
            'title' => $title,
            'done' => false
        ];
    }
    public function markDone(int $index): bool
    {
        if (!isset($this->tasks[$index])) {
            return false;
        }
        if ($this->tasks[$index]['done'] === true) {
            return true;
        }

        $this->tasks[$index]['done'] = true;
        return true;
    }
    public function deleteTask(int $index): bool
    {
        if (!isset($this->tasks[$index])) {
            return false;
        } else {
            unset($this->tasks[$index]);
            $this->tasks = array_values($this->tasks);
            return true;
        }
    }
    public function getAllTasks(): array
    {
        return $this->tasks;
    }
    public function getDoneCount(): int
    {
        $doneCount = 0;
        foreach ($this->tasks as $task) {
            if ($task['done'] === true) {
                $doneCount++;
            }
        }
        return $doneCount;
    }
    public function getPendingCount(): int
    {
        $pendingCount = 0;
        foreach ($this->tasks as $task) {
            if ($task['done'] === false) {
                $pendingCount++;
            }
        }
        return $pendingCount;
    }
}
$list = new TodoList("Taro");
$list->addTask('PHP復習');
$list->addTask('買い物');
$list->addTask('筋トレ');
// echo '<pre>';
// echo var_dump($list);
// echo '<pre/>';

$list->markDone(1);
echo '<pre>';
echo var_dump($list);
echo '<pre/>';

$list->markDone(1);
echo '<pre>';
echo var_dump($list);
echo '<pre/>';

$list->deleteTask(0);
echo '<pre>';
echo var_dump($list);
echo '<pre/>';

echo $list->getDoneCount();
echo '<pre>';
echo var_dump($list);
echo '<pre/>';

echo $list->getPendingCount();
echo '<pre>';
echo var_dump($list);
echo '<pre/>';
