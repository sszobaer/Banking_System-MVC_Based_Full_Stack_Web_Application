pipeline {
    agent any

    stages {
        stage('Build Docker Image') {
            steps {
                bat 'docker build -t banking-system-app .'
            }
        }

        stage('Security Scan') {
        steps {
            bat '"C:\\Users\\zobae\\AppData\\Roaming\\npm\\snyk.cmd" test || exit /b 0'
        }
    }


        stage('Deploy Locally') {
            steps {
                bat 'docker run -d -p 8082:80 banking-system-app'
            }
        }
    }
}
