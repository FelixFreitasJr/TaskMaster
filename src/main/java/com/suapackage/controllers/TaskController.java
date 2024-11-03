package com.suapackage.controllers;

import com.suapackage.models.Task;
import java.util.ArrayList;
import java.util.List;

public class TaskController {
    private List<Task> tasks;

    public TaskController() {
        tasks = new ArrayList<>();
    }

    // Métodos CRUD
    public void createTask(Task task) {
        tasks.add(task);
    }

    public List<Task> getTasks() {
        return tasks;
    }

    public Task getTaskById(int id) {
        for (Task task : tasks) {
            if (task.getId() == id) {
                return task;
            }
        }
        return null;
    }

    public void updateTask(Task task) {
        Task existingTask = getTaskById(task.getId());
        if (existingTask != null) {
            existingTask.setTitle(task.getTitle());
            existingTask.setDescription(task.getDescription());
            existingTask.setStatus(task.getStatus());
            existingTask.setCategory(task.getCategory());
        }
    }

    public void deleteTask(int id) {
        Task task = getTaskById(id);
        if (task != null) {
            tasks.remove(task);
        }
    }
}
