node {
    try {
        stage ('Clone') {
	cleanWs()
	withCredentials([gitUsernamePassword(credentialsId: 'Raju', gitToolName: 'Default')])  {
        sh 'git config --global user.email "rajeshwarinadar721@gmail.com"'
        sh 'git config --global user.name "Rajucoder"'
	sh 'git init'
        sh 'git clone --branch master https://github.com/Rajucoder/Credit.git'
        sh 'cd Credit'
        sh 'echo "Creating new Tag"'
        sh 'git tag release'
        sh 'git push origin release'
        sh 'echo "Tag pushed to remote"'
	}
        def repoUrl = checkout(scm).GIT_URL
	def key = repoUrl.tokenize('/')[3]
	def slug = repoUrl.tokenize('/')[4]
	echo "The projectKey is: ${key}"
	echo "The repositorySlug is: ${slug}" 
        }
    } catch (err) {
        currentBuild.result = 'FAILED'
        throw err
    }
} 
