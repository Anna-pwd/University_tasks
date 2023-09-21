package com.projekt;

import com.employee.Employee;

import java.util.Arrays;

public class Projekt {
    //pola
    String projektName;
    Employee employees [];

    @Override
    public String toString() {
        return "Projekt{" +
                "projektName='" + projektName + '\'' +
                ", employees=" + Arrays.toString(employees) +
                '}';
    }
}
