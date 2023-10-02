	if (!isatty(STDIN_FILENO)) {
		/* Non-interactive; input not from shell */
		child_pid = fork();  // Assign child_pid before using it

		if (child_pid == 0) {
			run_command(c, v, child_pid, v);
			printf("HANDL PATH, %s %s", v[1], v[2]);
			exit(0);
		}
		waitpid(child_pid, &status, 0);  // Wait for child process to finish
	} else {
		shell2(c, v);
	}