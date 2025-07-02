pipeline {
    agent any

    stages {
        stage('Clone') {
            steps {
                git 'https://github.com/sszobaer/Banking_System-MVC_Based_Full_Stack_Web_Application.git'
            }
        }

        stage('Build Image') {
            steps {
                sh 'docker build -t Banking_System-MVC_Based_Full_Stack_Web_Application .'
            }
        }

        stage('Security Scan') {
            steps {
                sh 'snyk test || true'
            }
        }

        stage('Deploy Locally') {
            steps {
                sh 'docker run -d -p 8081:80 Banking_System-MVC_Based_Full_Stack_Web_Application'
            }
        }
    }
}
