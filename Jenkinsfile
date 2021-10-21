node {
    try {
	cleanWs()
        stage ('Clone') {
	withCredentials([gitUsernamePassword(credentialsId: 'Raju', gitToolName: 'Default')])  {
        sh 'git config --global user.email "rajeshwarinadar721@gmail.com"'
        sh 'git config --global user.name "Rajucoder"'
        sh 'git clone https://github.com/Rajucoder/Credit.git'
        sh 'cd Credit'
	sh 'git init'
        sh 'echo "Creating new Tag"'
	sh 'git commit'
        sh 'git tag release -m "Release Candidate"'
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
