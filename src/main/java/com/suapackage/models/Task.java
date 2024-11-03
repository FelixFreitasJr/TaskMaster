package com.suapackage.models;

public class Task {
    private int id;
    private String title;
    private String description;
    private String status;
    private String category;

    public Task(int id, String title, String description, String status, String category) {
        this.id = id;
        this.title = title;
        this.description = description;
        this.status = status;
        this.category = category;
    }

    // Getters e Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getTitle() { return title; }
    public void setTitle(String title) { this.title = title; }

    public String getDescription() { return description; }
    public void setDescription(String description) { this.description = description; }

    public String getStatus() { return status; }
    public void setStatus(String status) { this.status = status; }

    public String getCategory() { return category; }
    public void setCategory(String category) { this.category = category; }
}
